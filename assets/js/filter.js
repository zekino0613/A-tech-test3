function fetchFilteredPosts(filterType, filterValue, paged = 1) {
  let data = new FormData();
  data.append("action", "filter_posts");
  data.append("filter_type", filterType);
  data.append("filter_value", filterValue);
  data.append("paged", paged);

  fetch(ajaxurl, {
      method: "POST",
      body: data,
  })
      .then((response) => response.text())
      .then((html) => {
          document.querySelector(".introduction-list").innerHTML = html;
      })
      .catch((error) => console.error("Error:", error));
}

// ✅ フィルターをクリックしたら `paged=1` にする
document.querySelectorAll(".category-filter, .prefecture-filter").forEach(function (button) {
  button.addEventListener("click", function (event) {
      event.preventDefault();
      let filterType = this.classList.contains("category-filter") ? "category" : "prefecture";
      let filterValue = this.dataset.filter;
      fetchFilteredPosts(filterType, filterValue, 1); // ✅ フィルター適用時にページをリセット
  });
});
