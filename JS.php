<?php

?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
   
    $(".edit-button").on("click", function() {
        var userData = JSON.parse($(this).attr("data-user"));
        var editButton = $(this);
        $('#user-name').val(userData.name);
        $('#user-email').val(userData.email);
        // $('#user-password').val(userData.password);
        $('#user-id').val(userData.id);
        $('#user-image-preview').attr('src',userData.userImage);
        $('#btn-saveUser').text('Update User').addClass('btn-warning').removeClass('btn-primary');

    });

    $(".delete-button").on("click", function() {
        var userId = $(this).attr("data-id");
        var deleteButton = $(this); 
        $.ajax({
            type: "POST",
            url: "functions.php", 
            data: { action: "deleteUser", userId: userId },
            success: function(response) {
                if (response.trim() === "success") { 
                    var card = deleteButton.closest(".card");
                    card.slideUp("slow", function() {
                        card.remove(); 
                    });
                } 
               else if (response.trim() === "no-user") { 
                    var card = deleteButton.closest(".card");
                    card.slideUp("slow", function() {
                        card.remove(); 
                    });
                    $('#last_card').removeClass('d-none');
                } 
                else {
                    alert("Failed to delete user.");
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert("An error occurred. Please try again later.");
            }
        });
    });
});

</script>