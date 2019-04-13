var one = prompt("Player One: Enter Your Name , you will be Blue")
var two = prompt("Player Two: Enter Your Name, you will be Red")
var raws = $(".row")
var col = $(".col")
var turn = true

$("h5").text(one +": it is your turn, please pick a column to drop your blue chip.")

$(col).on("click",dropChip)
// _________Droping the Chip____________________________________________
function dropChip(x) {
  if (turn) {
    $("h5").text(two+": it is your turn, please pick a column to drop your red chip.")
    var index = $(this).index()
    var columBlue = []
// ---------Make columes----------------------------------------------
    for (var i = 0; i < raws.length; i++) {
      columBlue.push($(raws).eq(i).children().eq(index))
    }
// -----------The Blue color chip-------------------------------------------

    for (var i = 0; i < columBlue.length; i++) {

      if (($(columBlue[i]).css("background-color") == "rgb(0, 0, 255)") || $(columBlue[i]).css("background-color") == "rgb(255, 0, 0)") {
        $(columBlue[i-1]).css("background-color", "blue")
      break}

    }if (columBlue[columBlue.length-1].css("background-color") == "rgb(221, 221, 221)") {
      $(columBlue[columBlue.length-1]).css("background-color", "blue")}
  turn = false
  winCheck()
}
// -----------The same but Red color Chip-----------------------------------------------
  else{
    $("h5").text(one +": it is your turn, please pick a column to drop your blue chip.")
    var index = $(this).index()
    var columRed = []
// ---------------------------------------------------------------------------
    for (var i = 0; i < raws.length; i++) {
      columRed.push($(raws).eq(i).children().eq(index))
    }
// ---------------------------------------------------------------------------
    for (var i = 0; i < columRed.length; i++) {

      if (($(columRed[i]).css("background-color") == "rgb(0, 0, 255)") || $(columRed[i]).css("background-color") == "rgb(255, 0, 0)") {
        $(columRed[i-1]).css("background-color", "red")
        break}

      }if (columRed[columRed.length-1].css("background-color") == "rgb(221, 221, 221)") {
      $(columRed[columRed.length-1]).css("background-color", "red")}

   turn = true
   winCheck()
 }}
 // ------Win Check >>>:D---------------------
function winCheck() {
  East_West()
  upDown()
  SouthE_NorthW()
  NorthE_SouthW()
}

// -------------------------------------------------------
function East_West() {

  var k = 0
while (k< 6) {

  // ---------------------------
  var countRed = 0
  var countBlue = 0
  let buttons = $(raws)[k].children
  // ---------------------------
  for (var i = 0; i < buttons.length; i++) {

    if (($(buttons[i]).css("background-color") == "rgb(0, 0, 255)") && ($(buttons[i+1]).css("background-color") == "rgb(0, 0, 255)")){
      countBlue++

    }if (($(buttons[i]).css("background-color") == "rgb(255, 0, 0)") && ($(buttons[i+1]).css("background-color") == "rgb(255, 0, 0)")){
      countRed++

    }if (countRed === 3) {
      return alert("Red is the Winner");
    }if (countBlue === 3) {
      return alert("Blue is the Winner");}}
    k++
}}
// -------------------------------------------------------------------
function upDown() {

  var x = 0
// -----------------------------------
  while (x < 7) {
    var countRed = 0
    var countBlue = 0
    var coulms = []
// -----------------------------------
    for (var i = 0; i < raws.length; i++) {
      coulms.push($(raws).eq(i).children().eq(x))
    }

    for (var i = 0; i < coulms.length; i++) {
      if ($(coulms[i]).css("background-color") == "rgb(0, 0, 255)" && $(coulms[i+1]).css("background-color") == "rgb(0, 0, 255)" ) {
        countBlue+=1

      }if ($(coulms[i]).css("background-color") == "rgb(255, 0, 0)" && $(coulms[i+1]).css("background-color") == "rgb(255, 0, 0)" ) {
        countRed+=1
      }
      if (countRed === 3) {
        return alert("Red is the Winner");

      }if (countBlue === 3) {
        return alert("Blue is the Winner");}
      }
x++}
}
// ---------------------------------------------------------------
function SouthE_NorthW() {
  var x = 0


  while (x < 6) {

    var parent = $(raws).eq(x)
    var temp = $(raws).eq(x)
    var child = temp.children()
    var winTest = []
    var countRed = 0
    var countBlue = 0
// ---------------------------------------------------------------

    for (var i = 0; i < 6; i++) {
      temp = $(raws).eq(x)

    for (var k = 0; k < 7; k++) {
      child = temp.children().eq(k+i)
      winTest.push($(child))
      temp = temp.next()}}

// ---------------------------------------------------------------

      for (var i = 0; i < 4; i++) {
        if ( winTest[i].css("background-color") == "rgb(0, 0, 255)" && winTest[i+1].css("background-color") == "rgb(0, 0, 255)"){
          countBlue+=1

        }if ( winTest[i].css("background-color") == "rgb(255, 0, 0)" && winTest[i+1].css("background-color") == "rgb(255, 0, 0)" ){
          countRed+=1
        }
        if (countRed === 3) {
          return alert("Red is the Winner");

        }if (countBlue === 3) {
          return alert("Blue is the Winner");}
}x++
}
}
// ---------------------------------------------------------------

function NorthE_SouthW() {
  var x = 0
  // ---------------------------------------------------------------
  while (x < 6) {

    var parent = $(raws).eq(x)
    var temp = $(raws).eq(x)
    var child = temp.children()
    var winTest = []
    var countRed = 0
    var countBlue = 0

    for (var i = 0; i < 6; i++) {
      temp = $(raws).eq(x)
// ---------------------------------------------------------------

    for (var k = 6; k > 0; k--) {
      child = temp.children().eq(k-i)
      winTest.push($(child))
      temp = temp.next()}}

// ---------------------------------------------------------------
    for (var i = 0; i < 4; i++) {
      if ( winTest[i].css("background-color") == "rgb(0, 0, 255)" && winTest[i+1].css("background-color") == "rgb(0, 0, 255)"){
          countBlue+=1

      }if ( winTest[i].css("background-color") == "rgb(255, 0, 0)" && winTest[i+1].css("background-color") == "rgb(255, 0, 0)" ){
         countRed+=1
      }
      if (countRed === 3) {
          return alert("Red is the Winner");

      }if (countBlue === 3) {
          return alert("Blue is the Winner");}
}x++
}
}
// ---------------------------------------------------------------
