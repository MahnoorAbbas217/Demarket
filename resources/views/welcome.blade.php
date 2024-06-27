<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Submission</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form id="profile-form">
        <input type="hidden" name="_token" id="csrf-token" value="rVIzqnYKTf7ZpEZRgX6ZxLWu0myUwAUyjUOkuz54">
        <input type="hidden" name="user_id" value="6946">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="Aon Muhammad Yasin" required>
        </div>
        <div>
            <label for="father_husband_name">Father/Husband Name:</label>
            <input type="text" id="father_husband_name" name="father_husband_name" value="Malik ghulam yasin" required>
        </div>
        <div>
            <label for="dob">Date of Birth:</label>
            <input type="text" id="dob" name="dob" value="13-11-2005" required>
        </div>
        <div>
            <label for="cnic_passport_number">CNIC/Passport Number:</label>
            <input type="text" id="cnic_passport_number" name="cnic_passport_number" value="32203-6201273-1" required>
        </div>
        <div>
            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" value="Male" required>
        </div>
        <div>
            <label for="religion">Religion:</label>
            <input type="text" id="religion" name="religion" value="islam" required>
        </div>
        <div>
            <label for="marital_status">Marital Status:</label>
            <input type="text" id="marital_status" name="marital_status" value="Single" required>
        </div>
        <div>
            <label for="spouse_name">Spouse Name:</label>
            <input type="text" id="spouse_name" name="spouse_name" value="">
        </div>
        <div>
            <label for="mobile">Mobile:</label>
            <input type="text" id="mobile" name="mobile" value="03367920596" required>
        </div>
        <div>
            <label for="whatsapp">Whatsapp:</label>
            <input type="text" id="whatsapp" name="whatsapp" value="03367920596" required>
        </div>
        <div>
            <label for="hafizquran">Hafiz Quran:</label>
            <input type="text" id="hafizquran" name="hafizquran" value="no" required>
        </div>
        <div>
            <label for="disable">Disable:</label>
            <input type="text" id="disable" name="disable" value="no" required>
        </div>
        <div>
            <label for="disabletype">Disable Type:</label>
            <input type="text" id="disabletype" name="disabletype" value="">
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="Chungi $ 6 Bypass road Layyah" required>
        </div>
        <div>
            <label for="permanent_address">Permanent Address:</label>
            <input type="text" id="permanent_address" name="permanent_address" value="Chungi $ 6 Bypass road Layyah" required>
        </div>
        <div>
            <label for="nationality">Nationality:</label>
            <input type="text" id="nationality" name="nationality" value="Pakistani" required>
        </div>
        <div>
            <label for="province">Province:</label>
            <input type="text" id="province" name="province" value="733" required>
        </div>
        <div>
            <label for="govtemployee">Government Employee:</label>
            <input type="text" id="govtemployee" name="govtemployee" value="no" required>
        </div>
        <div>
            <label for="profile_image">Profile Image:</label>
            <input type="file" id="profile_image" name="profile_image" required>
        </div>
        <input type="hidden" name="cmdpersonal" value="Next">
        <button type="submit">Submit</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#profile-form').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                var csrfToken = $('#csrf-token').val();

                $.ajax({
                    url: 'https://eportal.ul.edu.pk/careers/complete-profile',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        alert('Form submitted successfully!');
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        alert('Form submission failed!');
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
