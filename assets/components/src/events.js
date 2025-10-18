window.addEventListener('load', (event) => {

  var copied = false;

  document.querySelectorAll(".shareButtons a")[0].addEventListener("click", function (e) {
      navigator.clipboard.writeText(document.location.href);
      showTimerAlert("Link copied to clipboard.");
  });

  document.querySelectorAll(".shareButtons a")[1].addEventListener("click", function () {
    window.open("https://twitter.com/intent/tweet?text=BoxCoding is a website where we share free resources about web design and development to inspire design-focused frontend developers and to improve your coding skills.&url=https://www.avabucks.it/&size=large", "_blank")
  });

  document.querySelectorAll(".preview_opt").forEach((el, index) => {
    el.addEventListener("change", function (e) {
      var id = this.getAttribute('data-id');
      document.querySelector('[data-flip_id="' + id + '"]').classList.toggle("flipped");
      document.querySelector('[data-property_id="' + id + '"]').classList.add("disabled");
    });
  });

  document.querySelectorAll(".code_opt").forEach((el, index) => {
    el.addEventListener("change", function (e) {
      var id = this.getAttribute('data-id');
      document.querySelector('[data-flip_id="' + id + '"]').classList.toggle("flipped");
      document.querySelector('[data-property_id="' + id + '"]').classList.remove("disabled");
    });
  });

  document.querySelectorAll(".code").forEach((el, index) => {
    el.addEventListener("copy", function (e) {
      countAPI();
    });
  });

  document.querySelectorAll(".tab-language input").forEach((el, index) => {
    el.addEventListener("change", function (e) {
      var id = this.getAttribute('data-id');
      var val = e.target.value.toLowerCase();
      document.querySelectorAll('[data-code_id="' + id + '"] .snippetCode').forEach((snippetCode, index) => {
        snippetCode.classList.add("hidden");
        document.querySelector('[data-code_' + val + '_id="' + id + '"]').classList.remove("hidden");
      });
    });
  });

  document.querySelectorAll(".copy_code").forEach((el, index) => {
    el.addEventListener("click", function (e) {
      var id = this.getAttribute('data-id');
      var val = document.querySelector('[data-property_id="' + id + '"] input:checked').value.toLowerCase();
      var copied = document.querySelector('[data-code_' + val + '_id="' + id + '"]').innerText;
      navigator.clipboard.writeText(copied);
      countAPI();
      showTimerAlert("Code copied to clipboard.")
    });
  });

  AOS.init();
  hljs.highlightAll();

});

function countAPI() {
  var xhr = new XMLHttpRequest();
      xhr.open("GET", "https://api.countapi.xyz/hit/avabucks.it/copy");
      xhr.responseType = "json";
      xhr.onload = function() {
        console.log(this.response.value);
      }
      xhr.send();
}
