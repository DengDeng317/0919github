document.getElementById('profileImage').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profileImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

// document.getElementById('profileForm').addEventListener('submit', function(event) {
//     event.preventDefault();
//     const username = document.getElementById('username').value;
//     // You can add the logic to save the profile data here (e.g., sending to server)
//
//     alert(`名稱已修改為：${username}`);
// });

function uploadImage() {
    document.getElementById('fileInput').click();
}
