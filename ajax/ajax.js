document.addEventListener("DOMContentLoaded", function () {
    document.forms["register_form"].addEventListener("submit", PostData);
    fetchData();

});

function PostData(event) {
    event.preventDefault();

    var Name = document.getElementById("name").value;
    var Age = document.getElementById("age").value;
    var Address = document.getElementById("address").value;

    if (Name == "" || Address == "") {
        document.getElementById("message").innerHTML = "<p>Please Enter the details</p>";
        return;
    }
    var params = "name=" + Name + "&age=" + Age + "&address=" + Address;
    //console.log(params)
    var http = new XMLHttpRequest();
    http.open("POST", "http://localhost/php_practice/ajax/send.php", true);

    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            document.getElementById("message").innerHTML = http.responseText;
        }
    }
    http.send(params);
}


//get data

function fetchData(event) {
    var http2 = new XMLHttpRequest();
    http2.open("GET", "http://localhost/php_practice/ajax/send.php", true);

    http2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    http2.onreadystatechange = function () {
        if (http2.readyState === 4 && http2.status === 200) {

            var data = JSON.parse(http2.responseText);
            //console.log(data);

            // Find the element to display the data
            var output = document.getElementById("students_details");
            output.innerHTML = "";

            if (data.length > 0) {
                data.forEach(function (student, index) {
                    output.innerHTML += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${student.std_name}</td>
                                <td>${student.std_age}</td>
                                <td>${student.std_address}</td>
                                <td>
                                <button>Update</button>
                                <button>Delete</button>
                                </td>
                            </tr>
                        `;
                });
            } else {
                output.innerHTML = "<p>No students found.</p>";
            }
        }

    };
    http2.send();
}



