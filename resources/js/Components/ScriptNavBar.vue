<script>

</script>

<template>
  <main>
    <section id="sw-nav">
      <div class="logo">
        <img src="/images/maintle-logo.png" alt="maintle logo image">
      </div>
      <ul>
        <li><a href="/">Home</a></li>
        <li class="active"><a href="">My Scripts</a></li>
        <li><a href="">Statistics</a></li>
      </ul>
    </section>
    <section id="sw-body">
      <div class="sw-container">
        <slot />
      </div>
    </section>
  </main>
</template>

<style scoped>
main {
  height: 100svh;
  background-color: var(--text-color);
  box-sizing: border-box;
  display: grid;
  grid-template-columns: 300px 1fr;
}

#sw-nav {
  position: relative;
  border-right: 1px solid var(--border-color);
  border-radius: 3px;
  font-size: 20px;
}

#sw-nav ul li {
  height: 60px;
  border-bottom: 1px solid var(--border-color);
  border-radius: 3px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.active {
  background-color: var(--primary-color);
  color: var(--text-color);
}
#sw-nav li:hover {
  background-color: var(--alternate-color);
  color: var(--text-color);
}

#sw-body {
  background-color: var(--alternate-background-color);
  padding: 1rem;
}

.sw-container {
  border-radius: 15px;
  height: 90svh;
  display: grid;
  grid-template-rows: 70px 1fr;
  padding: 30px;
}
</style>