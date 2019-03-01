<div class="modal fade" id="{{ $modal_id }}" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">{{ $title }}</h4>
            </div>
            <div class="modal-body">
                {{ $content }}
            </div>
            <div class="modal-footer">
                {{ $button_action }}
            </div>
        </div>
    </div>
</div>