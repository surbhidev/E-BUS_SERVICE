function showSection(sectionId) {
    const sections = document.getElementsByClassName("section-content");
    for (let i = 0; i < sections.length; i++) {
      sections[i].style.display = "none";
    }
    document.getElementById(sectionId).style.display = "block";
  }
  
  