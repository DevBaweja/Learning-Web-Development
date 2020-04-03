// var have global scope
// let,const have block level scope
// let can be reassigned and
// const have fixed value

let age = 20;
age = 30;
console.log('age is ' + age);

const c = 20;
// c = 30;
// Uncaught TypeError: Assignment to constant variable.
console.log('constant is ' + c);

const k;
// Missing initializer in const declaration
// this will not give error in java
// as js is like python so it should give error  
k = 10;
