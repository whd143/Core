//Input file upload id="flpImage"

var allowedWidth, allowedHeight;

var hasError = false;
    
function validateImageSize(width, height) {
    if (width == allowedWidth && height == allowedHeight) {
        hideError();
        return !(hasError = false);
    } else {
        showError();
        return !(hasError = true);
    }
}
        
function showError() {
    $('#uploadPreview p').remove();
    $('#uploadPreview').append('<p>Image allowed size is ' + allowedWidth + ' x ' + allowedHeight +'</p>');
}

function hideError() {
    $('#uploadPreview p').remove();
}

function readImage(file) {
    var reader = new FileReader();
    var image = new Image();

    reader.readAsDataURL(file);
    reader.onload = function (_file) {
        image.src = _file.target.result;              // url.createObjectURL(file);
        image.onload = function () {
            var w = this.width,
                h = this.height,
                t = file.type,                           // ext only: // file.type.split('/')[1],
                n = file.name,
                s = ~~(file.size / 1024) + 'KB';
                    
            validateImageSize(w, h)/*Validating image dimensions*/
        };
        image.onerror = function () {
            alert('Invalid file type: ' + file.type);
        };
    };
}
