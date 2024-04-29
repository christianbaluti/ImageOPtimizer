document.addEventListener('DOMContentLoaded', function() {
    // Initialize FilePond
    const inputElement = document.getElementById('image');
    const pond = FilePond.create(inputElement);

    // Update quality value on slider change
    const qualityInput = document.getElementById('quality');
    const qualityValue = document.getElementById('quality-value');
    qualityInput.addEventListener('input', function(e) {
        qualityValue.textContent = e.target.value + '%';
    });

    // Optimize image on button click
    const optimizeButton = document.getElementById('optimize');
    optimizeButton.addEventListener('click', function() {
        const formData = new FormData();
        const file = pond.getFiles()[0].file;
        formData.append('image', file);
        formData.append('quality', qualityInput.value);
        formData.append('format', document.getElementById('format').value);

        fetch('optimize.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.blob())
        .then(blob => {
            // Create a download link for the optimized image
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'optimized-image.' + document.getElementById('format').value;
            document.body.appendChild(a);
            a.click();
            a.remove();
        })
        .catch(error => console.error('Error:', error));
    });
});
