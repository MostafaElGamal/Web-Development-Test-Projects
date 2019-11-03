// Basic function in js
const greatOne = function(name){
  console.log('Hello' + name)
}

greetOne('Mustafa')

// you will get the same result if you use arrow function 
const greatTwo = (name) => {
  console.log('Hello' + name)
}

// also you will get the same result if you use this if you have only one params 'Call back functions'
const greatThree = name => {
  console.log('Hello' + name)
}

// Call back functions
obj.method( name => {
  console.log(name)
})

// also you will get the same result if you want to make it in one line  
const greatThree = name => console.log('Hello' + name)
