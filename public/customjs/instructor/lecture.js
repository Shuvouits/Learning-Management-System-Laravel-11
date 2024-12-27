
/*  update preview */

$(document).ready(function () {
    $('input[type="file"][id^="video-"]').on('change', function (e) {
        const file = e.target.files[0];
        const lectureId = $(this).attr('id').split('-')[1]; // Extract lecture ID from the input ID
        const videoPreview = document.getElementById(`videoPreview-${lectureId}`); // Get the corresponding video preview element

        if (file) {
            const fileType = file.type;
            const validTypes = ['video/mp4', 'video/webm', 'video/ogg'];

            // Validate the file type
            if (!validTypes.includes(fileType)) {
                alert('Please upload a valid video file (MP4, WebM, OGG).');
                $(this).val(''); // Clear the input
                return;
            }

            // Show video preview
            videoPreview.src = URL.createObjectURL(file);
            videoPreview.style.display = 'block';
            videoPreview.load();
            videoPreview.onloadeddata = function () {
                URL.revokeObjectURL(this.src); // Free up memory
            };
        }
    });
});




/*   Create preview  */

$(document).ready(function () {
    // Attach change event to all video input fields
    $(document).on('change', '[id^=video]', function (e) {
        const input = $(this); // Get the current input
        const file = e.target.files[0];
        const modalId = input.closest('.modal').attr('id'); // Get the modal ID
        const videoPreviewId = `videoPreview-${modalId.split('-')[1]}`; // Extract the ID from the modal and create videoPreview ID
        const videoPreview = document.getElementById(videoPreviewId);

        if (file) {
            const fileType = file.type;
            const validTypes = ['video/mp4', 'video/webm', 'video/ogg'];

            // Validate the file type
            if (!validTypes.includes(fileType)) {
                alert('Please upload a valid video file (MP4, WebM, OGG).');
                input.val(''); // Clear the input
                return;
            }

            // Show video preview
            videoPreview.src = URL.createObjectURL(file);
            videoPreview.style.display = 'block';
            videoPreview.load();
            videoPreview.onloadeddata = function () {
                URL.revokeObjectURL(this.src); // Free up memory
            };
        }
    });
});








