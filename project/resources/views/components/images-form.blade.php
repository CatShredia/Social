<div class="mb-4">
    <label for="image_file" class="block text-sm font-medium text-gray-700">Image</label>
    <input type="file"
        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm file:border-0 file:bg-green-500 file:text-white file:rounded-md file:px-4 file:py-2 hover:file:bg-green-600 @error('image_file') border-red-500 @enderror"
        id="image_file" name="image_file" onchange="previewImage(event)">
    @error('image_file')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4" id="image-preview-container" style="display:none;">
    <img id="image-preview" src="" alt="Предпросмотр изображения"
        class="w-full h-auto mt-2 border border-gray-300 rounded-lg shadow-md">
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