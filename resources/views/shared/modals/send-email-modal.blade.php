<!-- Modal para Enviar Email (Compartido) -->
<div class="modal fade" id="sendEmailModal" tabindex="-1" aria-labelledby="sendEmailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sendEmailModalLabel">{{ __('messages.send_email_modal_title') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('accessibility.close') }}"></button>
      </div>
      <div class="modal-body">
        <form id="emailSendForm">
          @csrf
          <input type="hidden" id="modalStudentId" name="student_id">
          <input type="hidden" id="modalIdentifier" name="identifier">

          <div class="mb-3">
            <label for="emailSubject" class="form-label">{{ __('labels.subject') }}</label>
            <input type="text" class="form-control" id="emailSubject" name="subject" required>
          </div>

          <div class="mb-3">
            <label for="emailBody" class="form-label">{{ __('labels.body') }}</label>
            <textarea class="form-control" id="emailBody" name="body" rows="15"></textarea>
          </div>

          <div class="mb-3">
            <label for="emailCc" class="form-label">{{ __('labels.cc_email') }}</label>
            <input type="email" class="form-control" id="emailCc" name="cc_email" placeholder="{{ __('placeholders.optional_email') }}">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('buttons.cancel') }}</button>
        <button type="button" class="btn btn-primary" id="sendEmailModalBtn">{{ __('buttons.send_email') }}</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal para Enviar Email -->