// Javascript function to reject a claim using Ajax connection to PHP script

function rejectClaim (claimId) {

    // Display swal visual message to let admin confirm they wish to reject claim
    Swal.fire({
        title: "Are you sure?",
        text: "This action will reject this claim",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, reject it"
    }).then((result) => {
        // If admin confirms that they are sure they wish to proceed
        if(result.isConfirmed) {
            // Ajax call to PHP script to update db to reject claim
            $.ajax({
                type: "GET",
                url: "reject-claim.php",
                data: {claimId: claimId },
                success: function(data) {
                    Swal.fire({
                        text: "You have successfully rejected this claim",
                        icon: "success"
                    });
                    
                    document.getElementById(claimId).style.display = "none"; // Remove this claim from User View
                }
            });
        }
    })

}
