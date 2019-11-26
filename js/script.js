function addbtn() {
  let el = document.querySelector("#addform");
  if (el.style.display != "none") {
    el.style.display = "none";
  } else {
  el.style.display = "block";
  }
}

function showbtn() {
  let el = document.querySelector("#showtable");
  if (el.style.display != "none") {
    el.style.display = "none";
  } else {
  el.style.display = "table";
  }
}
