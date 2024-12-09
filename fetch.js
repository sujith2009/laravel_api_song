const data = async () => {
  const api = "https://jsonplaceholder.typicode.com/users";
  try {
    const response = await fetch(api);
    if (!response.ok) {
      // Change this condition to throw error when response is not ok
      throw new Error("Network response was not ok");
    }
    const data = await response.json();
    console.log(data); // Print data to console before returning
    return data;
  } catch (error) {
    console.log("There was a problem with the fetch operation:", error);
  }
};

data().then((data) => {
  // You can also log or handle the data here if needed
  console.log("Fetched data:", data);
});

// Function to create and insert the tabl
