var btn = document.querySelector("#btn")
var lis = document.querySelectorAll("td")


btn.addEventListener("click", function () {
  for (var i = 0; i < lis.length; i++) {
    lis[i].innerHTML = " "
  }
})

for (var i = 0; i < lis.length; i++) {
    lis[i].addEventListener("click",function (){
        console.log(this.textContent);
        if (this.textContent === " "){
          this.innerHTML = "X"
        }else if (this.textContent === "X") {
          this.innerHTML = "O"
        }else{
          this.innerHTML = " "
        }
    })
}
