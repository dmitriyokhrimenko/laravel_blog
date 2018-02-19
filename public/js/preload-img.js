function handleFileSelect(evt) {
    var file = evt.target.files; // FileList object
    var f = file[0];
    // Only process image files.
    if (!f.type.match('image.*')) {
        alert("Image only please....");
    }
    var reader = new FileReader();
    // Closure to capture the file information.
    reader.onload = (function(theFile) {
        return function(e) {
            // Render thumbnail.
            document.getElementById('output').innerHTML = '';
            document.getElementById('output').innerHTML = ['<img class="thumb" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
        };
    })(f);
    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
}
document.getElementById('thumbnail').addEventListener('change', handleFileSelect, false);