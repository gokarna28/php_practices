<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
</head>

<body>
    <div id="message"></div>
    <form id="register_form">
        <input id="name" type="text" placeholder="Name">
        <input id="age" type="number" placeholder="Age">
        <input id="address" type="text" placeholder="Address">
        <button type="submit">Submit</button>
    </form>


    <!-- //retrive data -->
    <div>
        <h1>Student Details</h1>
        <table>
            <thead>
                <th>S.N</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Action</th>
            </thead>
            <tbody id="students_details">
                <!-- retrive student details -->
            </tbody>
        </table>
    </div>
    <script src="ajax.js"></script>
</body>

</html>