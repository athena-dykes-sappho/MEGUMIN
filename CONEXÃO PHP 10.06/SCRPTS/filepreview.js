/* --------------------------------------------------------------------------- */
/* =========================================================================== */
/* --------------------------------------------------------------------------- */

/*  -- Forms Image Preview --  */

/* --------------------------------------------------------------------------- */

/*  > Consts >  */

const filePreview = document.getElementById('image-preview');
const fileInput = document.getElementById('input-image');

/* --------------------------------------------------------------------------- */

/*  > Show Image as Input Changes > */

fileInput.addEventListener("change", function () { // set event to be any change applied to the input element
    getImgData();
});

function getImgData() {
    const files = fileInput.files[0];

    if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);

        fileReader.addEventListener("load", function () { // set event to be when the element is loaded
            filePreview.src = '' + this.result + '';
        });    
    }
}

/* --------------------------------------------------------------------------- */
/* =========================================================================== */
/* --------------------------------------------------------------------------- */

/*  -- Forms Image Save In Folder --  */

/* --------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------- */

/*  > Consts >  */

const submitBtn = document.getElementById('submit-btn');

/* --------------------------------------------------------------------------- */

/*  > Save Image Through Path  > */



/* --------------------------------------------------------------------------- */
/* =========================================================================== */
/* --------------------------------------------------------------------------- */