<template>
  <!--COLORBUTTONS START-->
  <div class="fixed right-3 top-1/2">
    <label class="container"
      >Blau
      <div class="bg-blue-500 h-2 w-5 rounded-md"></div>
      <input type="radio" checked="checked" name="radio" />
      <span class="checkmark"></span>
    </label>
    <label class="container"
      >Rot
      <div class="bg-red-600 h-2 w-5 rounded-md"></div>
      <input type="radio" name="radio" />
      <span class="checkmark"></span>
    </label>
    <label class="container"
      >Gelb
      <div class="bg-yellow-300 h-2 w-5 rounded-md"></div>
      <input type="radio" name="radio" />
      <span class="checkmark"></span>
    </label>
    <label class="container"
      >Grün
      <div class="bg-green-500 h-2 w-5 rounded-md"></div>
      <input type="radio" name="radio" />
      <span class="checkmark"></span>
    </label>
    <label class="container"
      >Braun
      <div class="bg-yellow-900 h-2 w-5 rounded-md"></div>
      <input type="radio" name="radio" />
      <span class="checkmark"></span>
    </label>
  </div>
  <!--COLORBUTTONS END-->
</template>

<script>
export default {
  name: "ColorRadioButtons",
};
</script>



<style scoped>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 2rem;
  margin-bottom: 0.8rem;
  cursor: pointer;
  font-size: 0.9rem;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196f3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}
</style>