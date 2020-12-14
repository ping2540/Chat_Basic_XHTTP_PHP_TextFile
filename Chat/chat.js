function start() {
  window.setInterval(getData, 1000);
}

btn.addEventListener("click", function (e) {
  var username = document.getElementById("username").value;
  var message = document.getElementById("message").value;
  if (!isUsername(username)) {
    e.preventDefault();
    document.getElementById("username").focus();
    return;
  } else if (message.length == 0) {
    e.preventDefault();
    document.getElementById("message").focus();
  } else {
    e.preventDefault();
    const jso = { username: null, message: null };
    jso["username"] = username;
    jso["message"] = message;
    console.log(jso);
    checkDataServer(JSON.stringify(jso));
  }
});

const isUsername = (username) => /^[a-zA-Z0-9_]{1,}$/.test(username);

function checkDataServer(jsonString) {
  const request = new XMLHttpRequest();
  request.open("POST", "http://localhost/Hw_Expert/Chat/ReadWrite.php");
  request.setRequestHeader("Content-Type", "application/json");
  request.send(jsonString);
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("message").value = null;
      alert("SEND SUCCESS!!!");
    }
  };
}

function getData() {
  const req = new XMLHttpRequest();
  req.open("GET", "http://localhost/Hw_Expert/Chat/ReadWrite.php", true);
  req.setRequestHeader("Content-Type", "application/read");
  req.send();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("div_k").innerHTML = this.response;
      document
        .getElementById("div_k")
        .removeChild(document.getElementById("div_k").lastElementChild);
    }
  };
}
