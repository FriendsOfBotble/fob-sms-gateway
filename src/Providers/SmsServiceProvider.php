<?php

namespace FriendsOfBotble\Sms\Providers;

use Botble\Base\Facades\DashboardMenu;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use FriendsOfBotble\Sms\Contracts\Factory;
use FriendsOfBotble\Sms\Contracts\Otp;
use FriendsOfBotble\Sms\GuardManager;
use FriendsOfBotble\Sms\Http\Middleware\EnsurePhoneIsVerified;
use FriendsOfBotble\Sms\OtpGenerator;
use FriendsOfBotble\Sms\SmsManager;
use Illuminate\Foundation\Application;

class SmsServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register(): void
    {
        if (! class_exists('Twilio\Rest\Client')) {
            require __DIR__ . '/../../vendor/autoload.php';
        }

        $this->app->singleton(
            Factory::class,
            fn (Application $app) => new SmsManager($app)
        );

        $this->app->bind(
            Otp::class,
            fn () => new OtpGenerator(setting('fob_otp_expires_in', 5))
        );

        $this->app->scoped(GuardManager::class, fn () => new GuardManager(setting('fob_otp_guard')));
    }

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/sms')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishTranslations()
            ->registerDashboardMenu()
            ->loadAndPublishViews()
            ->loadMigrations()
            ->publishAssets()
            ->loadRoutes();

        add_filter(BASE_FILTER_GROUP_PUBLIC_ROUTE, function (array $data): array {
            $data['middleware'][] = EnsurePhoneIsVerified::class;

            return $data;
        }, 999);

        $this->app->register(EventServiceProvider::class);
    }

    protected function registerDashboardMenu(): self
    {
        DashboardMenu::beforeRetrieving(function () {
            DashboardMenu::make()
                ->registerItem([
                    'id' => 'cms-plugins-sms',
                    'priority' => 10,
                    'name' => 'plugins/sms::sms.name',
                    'icon' => 'ti ti-device-mobile-message',
                ])
                ->registerItem([
                    'id' => 'cms-plugins-sms-gateways',
                    'parent_id' => 'cms-plugins-sms',
                    'priority' => 0,
                    'name' => 'plugins/sms::sms.name',
                    'url' => fn () => route('sms.gateways.index'),
                    'permissions' => ['sms.gateways'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-sms-logs',
                    'parent_id' => 'cms-plugins-sms',
                    'priority' => 10,
                    'name' => 'plugins/sms::sms.logs.title',
                    'url' => fn () => route('sms.logs.index'),
                    'permissions' => ['sms.logs'],
                ]);
        });

        return $this;
    }
}
