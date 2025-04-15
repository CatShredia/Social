<!-- Поле для загрузки изображения -->
<div class="mb-3">
    <label for="image_file" class="form-label">Изображение</label>
    <input type="file" class="form-control @error('image_file') is-invalid @enderror" id="image_file" name="image_file"
        onchange="previewImage(event)">
    @error('image_file')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Место для предварительного просмотра изображения -->
<div class="mb-3" id="image-preview-container" style="display:none;">
    <img id="image-preview" src="" alt="Предпросмотр изображения" class="img-fluid">
</div>

@push('scripts')
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function () {
                const imagePreview = document.getElementById('image-preview');
                const previewContainer = document.getElementById('image-preview-container');
                imagePreview.src = reader.result;
                previewContainer.style.display = 'block';

                localStorage.setItem('imagePreview', reader.result);
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const imagePreview = document.getElementById('image-preview');
            const previewContainer = document.getElementById('image-preview-container');
            const savedImage = localStorage.getItem('imagePreview');

            if (savedImage) {
                imagePreview.src = savedImage;
                previewContainer.style.display = 'block';
            }
        });
    </script>
@endpush