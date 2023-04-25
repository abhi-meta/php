
// $(document).ready(function (e) {
//     $("#formtoupload").on('submit', (function (e) {
//         e.preventDefault();
        
//         let formData = new FormData(this);
//         let name= formData.get('fileToUpload');



//         if(name.size == 0) {
//             alert("Upload a file");
//             return;
//         }
            
//         $.ajax({
//             url: "upload.php",
//             type: "POST",
//             data: new FormData(this),
//             contentType: false,
//             cache: false,
//             processData: false,
//             beforeSend: function () {
//                 //$("#preview").fadeOut();
//                 //    $("#err").fadeOut();
//                 console.log("before")
//             },
//             success: function (data) {
//                 if (data == 'invalid') {
//                     // invalid file format.
//                     // $("#err").html("Invalid File !").fadeIn();
//                     console.log("data is invalid");
//                 }
//                 else {
//                     // view uploaded file.
//                     // $("#preview").html(data).fadeIn();
//                     console.log("data is valid");
//                     $("#formtoupload")[0].reset();
//                     window.location.href = "http://localhost:8040/fileupload/upload.php";
//                 }
//             },
//             error: function (e) {
//                 $("#err").html(e).fadeIn();
//             }
//         });

//     }));
// });