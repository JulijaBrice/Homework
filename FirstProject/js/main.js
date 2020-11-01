
var btn = document.getElementById("Feedback_btn")

btn.addEventListener("click", function (event) {
  var slide_form = document.getElementById("slideout_inner");
  var isVisible = slide_form.classList.contains("slideout_visible");
  if (isVisible) {
    slide_form.classList.remove("slideout_visible");
  }
  else {
    slide_form.classList.add("slideout_visible");
  }
});

var select = document.getElementById("feedback_select");
select.addEventListener("change", function () {
  console.log(select.value);
  if (select.value == "needs improvement") {
    document.getElementById("SubjectArea").style.visibility = "visible";
  }
  else {
    document.getElementById("SubjectArea").style.visibility = "hidden";
  }
});

// KNOPKA SUBMIT
var button_submit = document.getElementById("submit_btn");
button_submit.addEventListener("click", function (event) {
  var valid_result = funkcija_dlja_validacii();
  if (valid_result == true) {
    // save input to table
    let userList = localStorage.userList;

    if (userList) {
      userList = JSON.parse(userList);
    } else {
      userList = [];
    }

    var users_name = document.getElementById("name").value;
    var users_email = document.getElementById("email").value;
    var select_fdbk = document.getElementById("feedback_select").value;
    var feedback_text = document.getElementById("feedback_text").value;

    const user = {
      username: users_name,
      email: users_email,
      feedback: select_fdbk,
      subject: feedback_text,
    };

    userList.push(JSON.stringify(user));
    localStorage.userList = JSON.stringify(userList);
    renderTable();

    document.getElementById("popupen_text").innerHTML = "Thank you for your feedback " + users_name + "!";
    modal.style.display = "block"; // eta strochka delajet popup vidimim 
  }
});

var funkcija_dlja_validacii = function () {
  var is_valid = true;
  // obnulitj error message
  const errorMsgBlocks = document.getElementsByClassName("error-msg");
  Object.values(errorMsgBlocks).forEach(function (block) {
    block.innerHTML = "";
  });

  var users_name = document.getElementById("name").value;
  if (users_name.length < 4) {
    const errorMsg = document.getElementsByClassName("error-msg username")[0];
    errorMsg.innerHTML = "Min 4 characters for username"
    is_valid = false;
  }

  var users_email = document.getElementById("email").value;
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (!re.test(users_email)) {
    const errorMsg = document.getElementsByClassName("error-msg email")[0];
    errorMsg.innerHTML = "Not valid email"
    is_valid = false;
  }

  var select_fdbk = document.getElementById("feedback_select");
  if (select_fdbk.value == "empty") {
    const errorMsg = document.getElementsByClassName("error-msg feedback_type")[0];
    errorMsg.innerHTML = "Please select feedback type"
    is_valid = false;
  }

  if (select_fdbk.value == "needs improvement") {
    const feedback_text = document.getElementById("feedback_text").value;
    if (feedback_text.length < 10) {
      const errorMsg = document.getElementsByClassName("error-msg feedback_text")[0];
      errorMsg.innerHTML = "Please describe your experience"
      is_valid = false;
    }
  }
  return is_valid;
}

var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
span.onclick = function () {
  modal.style.display = "none";
}
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function renderTable() {
  const table = document.getElementById("users-table-tbody");
  const usersList = JSON.parse(localStorage.userList);
  table.innerHTML = "";

  usersList.forEach(function (user, index) {
    user = JSON.parse(user)
    table.innerHTML += `
      <tr>
      <td>` + index + `</td>
      <td>` + user.username + `</td>
      <td>` + user.email + `</td>
      <td>` + user.feedback + `</td>
      <td>` + user.subject + `</td>
      <td>
        <button class="delete-btn" user-id=` + index + `>Delete</button>
      </td>
      </tr>`
  })

  const deleteBtns = document.getElementsByClassName("delete-btn");
  Object.values(deleteBtns).forEach(function (btn) {
    btn.addEventListener("click", function (event) {
      const userId = event.target.getAttribute("user-id");
      console.log("Trigger delete user" + userId);
      const userList = JSON.parse(localStorage.userList);
      userList.splice(userId, 1);
      localStorage.userList = JSON.stringify(userList);
      renderTable();
    })
  })
}
renderTable();