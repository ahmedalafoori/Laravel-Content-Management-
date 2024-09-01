document.addEventListener('DOMContentLoaded', function() {
    // Preview uploaded images
    const mediaInput = document.getElementById('media');
    const previewContainer = document.getElementById('preview-container');

    if (mediaInput && previewContainer) {
        mediaInput.addEventListener('change', function(event) {
            previewContainer.innerHTML = '';
            const files = event.target.files;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const previewElement = document.createElement('div');
                    previewElement.className = 'preview-item';

                    if (file.type.startsWith('image/')) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-full h-32 object-cover rounded';
                        previewElement.appendChild(img);
                    } else if (file.type.startsWith('video/')) {
                        const video = document.createElement('video');
                        video.src = e.target.result;
                        video.className = 'w-full h-32 object-cover rounded';
                        video.controls = true;
                        previewElement.appendChild(video);
                    } else if (file.type.startsWith('audio/')) {
                        const audio = document.createElement('audio');
                        audio.src = e.target.result;
                        audio.className = 'w-full';
                        audio.controls = true;
                        previewElement.appendChild(audio);
                    }

                    previewContainer.appendChild(previewElement);
                };

                reader.readAsDataURL(file);
            }
        });
    }

    // Confirm delete
    const deleteForm = document.querySelector('form[action^="/posts"][action$="/destroy"]');
    if (deleteForm) {
        deleteForm.addEventListener('submit', function(event) {
            if (!confirm('Are you sure you want to delete this post?')) {
                event.preventDefault();
            }
        });
    }
});
