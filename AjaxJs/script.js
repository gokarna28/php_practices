

document.addEventListener("DOMContentLoaded", function () {
    var registerForm = document.getElementById("registerForm");
    registerForm.addEventListener("submit", InsertData);


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
            std_address: address,
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
                //console.log(message.id);

                document.getElementById("response").innerHTML = message.success;

                // location.reload();
                result.insertRow().innerHTML = `
                    <tr>
                        <td>${t_length}</td>
                        <td>${message.name}</td>
                        <td>${message.age}</td>
                        <td>${message.address}</td>
                        <td>
                            <button>update</button>
                            <button onclick='DeleteStudent(${message.id}, this)'>delete</button>
                        </td>
                    </tr>`;
            }
        }
        xhttp.send(JSON.stringify(params));
    }
    registerForm.reset();
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
                <tr class="border-b border-slate-300 bg-gray-200 hover:bg-gray-300 cursor-pointer">
                    <td class="p-2">${index + 1}</td>
                    <td class="p-2">${item.std_name}</td>
                    <td class="p-2">${item.std_age}</td>
                    <td class="p-2">${item.std_address}</td>
                    <td class="p-2">
                        <button class="updateBtn bg-sky-500 text-white px-2 py-1 rounded-md" 
                        data-id="${item.id}";
                        data-name="${item.std_name}";
                        data-age="${item.std_age}";
                        data-address="${item.std_address}";
                        >update</button>

                        <button onclick="DeleteStudent(${item.id}, this)" class="bg-orange-700 text-white px-2 py-1 rounded-md">delete</button>
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
function DeleteStudent(ID, obj) {
    //console.log("Delete student with ID:", ID);
    // var test = this.parentElement;
    // console.log(test);
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
            //console.log(respo.ID);

            if (ID == respo.ID) {
                var row = obj.parentElement.parentElement;
                //console.log(row);
                row.remove();
            }
        }
    }
    Http.send(JSON.stringify(params));
}



//update table
document.addEventListener("click", function (event) {
    // Check if the clicked element has the class 'updateBtn'
    if (event.target && event.target.classList.contains("updateBtn")) {

        let id = event.target.getAttribute("data-id");
        let name = event.target.getAttribute("data-name");
        let age = event.target.getAttribute("data-age");
        let address = event.target.getAttribute("data-address");

        var update_container = document.getElementById("updateForm");
        update_container.classList.remove("hidden");
        update_container.innerHTML = `
        <div class="h-screen flex items-center justify-center w-full">
            <div class="bg-slate-400 w-1/2 rounded-md p-4 flex flex-col items-center justify-center space-y-6">

            <div class="flex w-full justify-end"><i class="fa-solid fa-xmark text-2xl hover:text-red-500" onclick="closeUpdateForm()"></i></div>

                <h1 class="text-2xl font-bold">Update Form</h1>

                <div id="message"></div>

                <form class="update_form flex flex-col items-center justify-center space-y-4">
                <input type="hidden" id="up_id" value="${id}">
                <input id="up_name" class="border border-slate-400 rounded-md px-3 py-1 text-lg" type="text" value="${name}" required>
                <input id="up_age" class="border border-slate-400 rounded-md px-3 py-1 text-lg" type="number" value="${age}" required>
                <input id="up_address" class="border border-slate-400 rounded-md px-3 py-1 text-lg" type="text" value="${address}" required>

                <button type="submit" class="bg-green-700 text-white text-xl font-medium px-6 py-2 rounded-md">Save</button>
                </form>
            </div>
        </div>
           
        `;
    }
});


// update students details
document.addEventListener('submit', (event) => {
    event.preventDefault();
    if (event.target && event.target.classList.contains("update_form")) {

        let update_id = document.getElementById("up_id").value;
        let update_name = document.getElementById("up_name").value;
        let update_age = document.getElementById("up_age").value;
        let update_address = document.getElementById("up_address").value;

        if (update_name == "" || update_age == "" || update_address == "") {
            document.getElementById("message").innerHTML = "Fill all the details";
        } else {
            var data = {
                upd_id: update_id,
                upd_name: update_name,
                upd_age: update_age,
                upd_address: update_address,
            };
            //console.log(data);

            var xhl = new XMLHttpRequest();
            xhl.open("POST", "update.php", true);

            xhl.setRequestHeader("Content-type", "application/json");

            xhl.onreadystatechange = function () {
                if (xhl.readyState == 4 && xhl.status == 200) {
                    document.getElementById("message").innerHTML = xhl.responseText;
                }
            }
            xhl.send(JSON.stringify(data));
        }
    }
});


//close the update form
function closeUpdateForm() {
    var update_container = document.getElementById("updateForm");
    update_container.classList.add("hidden");

    location.reload();
}