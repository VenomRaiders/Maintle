

<script setup>

</script>

<template>
  <main>
    <section id="sw-nav">
      <div class="logo">
        <img src="/images/maintle-logo.png" alt="maintle logo image">
      </div>
      <ul>
        <li><a href="">Home</a></li>
        <li class="active"><a href="">My Scripts</a></li>
        <li><a href="">Statistics</a></li>
      </ul>

      <div class="sw-nav-footer">
        <a href="">LogOut</a>
      </div>
    </section>
    <section id="sw-body">
      <div class="sw-container">
        <div>Header section for notifications etc. still too style the components</div>
        <div>Body of the page</div>
      </div>
    </section>
  </main>
</template>

<style scoped>
main {
  height: 100svh;
  background-color: white;
  box-sizing: border-box;
  display: grid;
  grid-template-columns: 300px 1fr;
}

#sw-nav {
  position: relative;
  /* padding: 1rem; */
  border-right: 1px solid rgba(211, 211, 211, 0.555);
  border-radius: 3px;
  font-size: 20px;
}

#sw-nav .sw-nav-footer {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 50px;
  position: absolute;
  bottom: 0;
  margin-bottom: 30px;
  border-bottom: 1px solid rgba(211, 211, 211, 0.473);
  border-radius: 3px;
}

#sw-nav ul li {
  height: 60px;
  border-bottom: 1px solid rgba(211, 211, 211, 0.473);
  border-radius: 3px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.active {
  background-color: #CD5378;
  color: white;
}
#sw-nav li:hover, .sw-nav-footer:hover {
  background-color: #ccca2b;
  color: white;
}

#sw-body {
  background-color: whitesmoke;
  padding: 2rem;
}

.sw-container {
  background-color: #53cda83b;
  border-radius: 15px;
  height: 90svh;
  display: grid;
  grid-template-rows: 100px 1fr;
  padding: 30px;
}
</style>