/*function showSection(sectionId) {
    const sections = document.getElementsByClassName("section-content");
    for (let i = 0; i < sections.length; i++) {
      sections[i].style.display = "none";
    }
    document.getElementById(sectionId).style.display = "block";
  }*/
  
  function showSection(sectionId) {
    // Hide all sections
    var sections = document.getElementsByClassName("section-content");
    for (var i = 0; i < sections.length; i++) {
      sections[i].style.display = "none";
    }
    
    // Show the selected section
    var section = document.getElementById(sectionId);
    if (section) {
      section.style.display = "block";
    }
  }