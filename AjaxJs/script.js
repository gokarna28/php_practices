

document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener("submit", InsertData);

});

function InsertData(event) {
    event.preventDefault();

    var name = document.getElementById("std_name").value;
    var age = document.getElementById("std_age").value;
    var address = document.getElementById('std_address').value;

    if (name == "" || age == "" || address == "") {
        document.getElementById("response").innerHTML = "Fill all the details";
    } else {

        var params = {
            std_name: name,
            std_age: age,
            std_address: address
        };

        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "submit.php", true);

        xhttp.setRequestHeader("Content-type", "application/json");

        xhttp.onreadystatechange = function () {

            var result = document.getElementById("studentsDetails");

            var Table = document.getElementById("student_table");
            var t_length = Table.rows.length;
            //console.log(t_length);

            if (xhttp.readyState == 4 && xhttp.status == 200) {
                var message = JSON.parse(xhttp.responseText);
                console.log(message);
                //console.log(message.success)
                document.getElementById("response").innerHTML = message.success;

                // location.reload();
                result.insertRow().innerHTML =
                    "<tr>" +
                    "<td>" + t_length + "</td>" +
                    "<td>" + message.name + "</td>" +
                    "<td>" + message.age + "</td>" +
                    "<td>" + message.address + "</td>" +
                    "<td>" + "<button>update</button> " + "<button onclick='deleteStudent(this)'>delete</button > " + "</td>" +
                    "<tr>";
            }
        }
        xhttp.send(JSON.stringify(params));
    }
    8
}



//retrive data 
function RetriveData() {

    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "submit.php", true);

    xhttp.onreadystatechange = function () {

        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var result = document.getElementById("studentsDetails");

            if (xhttp.responseText) {
                var data = JSON.parse(xhttp.responseText);
                //console.log(data);

                result.innerHTML = "";
                //console.log(data);
                data.forEach(function (item, index) {
                    result.innerHTML += `
                <tr id="row-${item.id}">
                    <td>${index + 1}</td>
                    <td>${item.std_name}</td>
                    <td>${item.std_age}</td>
                    <td>${item.std_address}</td>
                    <td>
                        <button>update</button>
                        <button onclick="DeleteStudent(${item.id})">delete</button>
                    </td>
                </tr>
                `;

                });
            } else {
                result.innerHTML = "no data";
            }
        }
    }
    xhttp.send();
}
RetriveData();


//delete the student data
function DeleteStudent(ID) {
    // console.log("Delete student with ID:", ID);

    var Http = new XMLHttpRequest();
    Http.open("POST", "delete.php", true);

    var params = {
        Id: ID
    };
    // console.log(params);
    Http.setRequestHeader("content-type", "application/json");

    Http.onreadystatechange = function () {

        if (Http.readyState == 4 && Http.status == 200) {
            var respo = JSON.parse(Http.responseText);

            //console.log(respo)
            document.getElementById("response").innerHTML = respo.success;
            if (ID == respo.ID) {
                var row = document.getElementById("row-" + ID);
                row.style.display = "none";
            }
        }
    }
    Http.send(JSON.stringify(params));
}


// function deleteStudent(button) {
//     // `button` is the clicked delete button
//     var row = button.parentNode.parentNode;
//     row.parentNode.removeChild(row);
// }