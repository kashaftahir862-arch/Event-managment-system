// Select all navbar links
const links = document.querySelectorAll(".navbar ul li a");

// Get the current page file name
const currentPage = window.location.pathname.split("/").pop();

// Loop through links and set active class
links.forEach(link => {
  link.classList.remove("active"); // remove active from all links
  if (link.getAttribute("href") === currentPage) {
    link.classList.add("active"); // add active class to current page link
  }
});