$(() => {
    $(document)
        .on('click', '[data-bb-toggle="toggle-setting-form"]', (e) => {
            e.preventDefault()

            $(e.currentTarget).closest('.sms-gateway').find('.sms-gateway-content').slideToggle()
        })

        .on('click', '[data-bb-toggle="change-status"]', (e) => {
            e.preventDefault()

            const $currentTarget = $(e.currentTarget)

            $httpClient
                .make()
                .withButtonLoading($currentTarget)
                .post($currentTarget.data('url'))
                .then(({ data }) => {
                    Botble.showSuccess(data.message)

                    if (data.data.activated) {
                        $currentTarget.hide()
                        $currentTarget.siblings('[data-bb-toggle="toggle-setting-form"]').show()
                        $currentTarget.closest('.sms-gateway').find('.sms-gateway-content').slideDown()
                    } else {
                        $currentTarget.closest('.sms-gateway').find('[data-bb-toggle="toggle-setting-form"]').hide()
                        $currentTarget.closest('.sms-gateway').find('[data-bb-toggle="change-status"]').show()
                        $currentTarget.closest('.sms-gateway').find('.sms-gateway-content').slideUp()
                    }
                })
        })
        .on('submit', '.sms-gateway-form', (e) => {
            e.preventDefault()

            const $form = $(e.currentTarget)
            const $button = $(e.originalEvent.submitter)

            $httpClient
                .make()
                .withButtonLoading($button)
                .post($form.prop('action'), $form.serialize())
                .then(({ data }) => {
                    Botble.showSuccess(data.message)
                })
        })
        .on('show.bs.modal', '#test-sms-modal', (e) => {
            const $modal = $(e.currentTarget)
            const $relatedTarget = $(e.relatedTarget)

            $modal.find('[name="gateway"]').val($relatedTarget.data('gateway'))
        })
        .on('submit', '#test-sms-modal form', (e) => {
            e.preventDefault()

            const $form = $(e.currentTarget)
            const $modal = $form.closest('.modal')
            const $button = $form.find('button[type="submit"]')

            $httpClient
                .make()
                .withButtonLoading($button)
                .post($form.prop('action'), $form.serialize())
                .then(({ data }) => {
                    Botble.showSuccess(data.message)

                    $modal.modal('hide')
                })
                .catch((error) => {
                    if (error.response.status === 200) {
                        $modal.modal('hide')
                    }
                })
        })
})
