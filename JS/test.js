const readline = require('readline');

// Create interface for input/output
const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

// Ask for the first number
rl.question("Enter the first number: ", (input1) => {
  const num1 = parseFloat(input1);

  // Ask for the second number
  rl.question("Enter the second number: ", (input2) => {
    const num2 = parseFloat(input2);

    const sum = num1 + num2;
    console.log("The sum is: " + sum);

    // Close the input interface
    rl.close();
  });
});
