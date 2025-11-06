<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tips</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
  margin: 0;
  font-family: 'Poppins', sans-serif;
  background: #f3f4f6;
  color: #333;
}

header {
  text-align: center;
  padding: 20px;
  background: #007bff;
  color: white;
}

.search-bar {
  margin-top: 15px;
}

.search-bar input {
  padding: 10px;
  width: 60%;
  border: none;
  border-radius: 5px 0 0 5px;
  outline: none;
  font-size: 16px;
}

.search-bar button {
  padding: 10px 20px;
  border: none;
  background: #0056b3;
  color: white;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 16px;
  transition: background 0.3s ease;
}

.search-bar button:hover {
  background: #003d80;
}

.gallery {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 15px;
  padding: 20px;
}

.gallery img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 10px;
  transition: transform 0.3s ease;
  cursor: pointer;
}

.gallery img:hover {
  transform: scale(1.05);
}

footer {
  text-align: center;
  padding: 15px;
  background: #007bff;
  color: white;
  margin-top: 30px;
}
  </style>
</head>
<body>

  <header>
    <h1>Wallpaper Gallery</h1>
    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="Search wallpapers...">
      <button id="searchBtn">Search</button>
    </div>
  </header>

  <main>
    <div id="gallery" class="gallery"></div>
  </main>

  <footer>
    <p>© 2025 Tips by Gokah Israel. All rights reserved.</p>
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
  loadWallpapers();

  document.getElementById("searchBtn").addEventListener("click", () => {
    const query = document.getElementById("searchInput").value.trim();
    loadWallpapers(query);
  });
});

function loadWallpapers(query = "") {
  const gallery = document.getElementById("gallery");
  gallery.innerHTML = "<p>Loading wallpapers...</p>";

  fetch(`wallpapers.php?q=${encodeURIComponent(query)}`)
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        gallery.innerHTML = `<p>${data.error}</p>`;
      } else if (data.wallpapers.length === 0) {
        gallery.innerHTML = `<p>No wallpapers found.</p>`;
      } else {
        gallery.innerHTML = data.wallpapers.map(img => `
          <img src="${img.url}" alt="${img.name}">
        `).join("");
      }
    })
    .catch(err => {
      gallery.innerHTML = `<p>Error: ${err.message}</p>`;
  
  </script>
                                     </body>
</html> Tips
The website for you 
