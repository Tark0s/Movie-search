# 🎞 Movie Search 🔍

## 📖 Project Description

This project is a simple application based on the Symfony framework, allowing users to search and display a movie list based on specific criteria. The project consists of a single controller, `SearchController`, and a service, `MoviesService`, which handles the data processing logic.

The application renders appropriate views depending on the user's query.

---

## ✨ Features

The application includes a single access point (endpoint) available at the path `/`. The user can pass the `param` parameter within the request URL to define the criteria for displaying the movie list.

### 🔧 Possible values for the `param` parameter:

- 🎲 `random` - Returns a random list of 3 movies.
- ✉️ `evenWithW` - Returns movies with titles of even length that contain the letter "W".
- 📝 `moreThan1Word` - Returns movies with titles consisting of more than one word.
- ❌ **Default** (no `param` or invalid value) - Returns an empty list.

---

## 📂 Project Structure

### 🎮 Controller

- **`SearchController`**  
  The controller manages the `/` path and renders two views depending on the presence of the parameter in the request:
  - If the `param` parameter is present and recognized, the `search/result.html.twig` view is rendered with the list of movies.
  - If no parameter is provided, or the parameter is invalid, the `search/index.html.twig` view is displayed.

### 🖼 Views

- 🏠 `search/index.html.twig`  
  The homepage available at `/`, encouraging users to provide a search parameter.
  
- 📜 `search/result.html.twig`  
  The results page displaying the list of movies matching the given criteria.

### 🛠 Service

- **`MoviesService`**  
  The service handles the logic for searching and filtering movies. It provides the following functionality:
  - 🎲 `getRandomMovies(int $count)` - Retrieves a random number of movies.
  - 🔍 `getEvenLengthTitlesWithW()` - Retrieves movies with titles of even length that contain the letter "W".
  - 📝 `getMultiWordTitles()` - Retrieves movies with titles consisting of more than one word.

---

## 📋 Requirements

- 🐘 **PHP**: 8.2+  
- 🎵 **Symfony**: 7.2
- 📦 **Composer**

---

## 🛠 Installation and Setup

1. **Clone the repository**:  
   ```bash
   git clone https://github.com/Tark0s/Movie-search.git
   cd Movie-search
   ```

2. **Install dependencies**:  
   ```bash
   composer install
   ```

3. **Run the development server**:  
   ```bash
   symfony server:start
   ```

4. **Access the application**:  
   Open your browser and go to `http://localhost:8000`.

---

## 🎯 How to Use

1. Open the application at the `/` path.
2. Add the `param` parameter to your query, for example:
   - 🏠 `/` - Homepage without any results.
   - 🎲 `/?param=random` - Displays a random list of movies.
   - ✉️ `/?param=evenWithW` - Displays movies with titles containing the letter "W".
   - 📝 `/?param=moreThan1Word` - Displays movies with titles consisting of more than one word.

