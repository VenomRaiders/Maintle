<script setup>
import ScriptwritersAdmin from "@/Components/ScriptwritersAdmin.vue";
import StandardButton from "@/Components/StandardButton.vue";
import Tags from "@/Components/Tags.vue";
</script>

<template>
    <ScriptwritersAdmin>
        <div class="card">
            <div class="col-1">
                <img src="/images/image.jpg" alt="script image" />
            </div>
            <div class="col-2">
    
                <div class="card-body">
                    <h1>The Uncharted sea</h1>
                    <Tags text="Funk"/>
                    <Tags text="Funk"/>
                    <p>This is some data that was added in here to test the script
                        This is some data that was added in here to test the script
                        This is some data that was added in here to test the script
                    </p>
                </div>
                <div class="card-buttons">
                    <StandardButton class="ssa" text="Reject"  />
                    <StandardButton text="View"/>
                </div>
            </div>     
        </div>

        <div class="card">
            <div class="col-1">
                <img src="/images/image.jpg" alt="script image" />
            </div>
            <div class="col-2">
    
                <div class="card-body">
                    <h1>The Uncharted sea</h1>
                    <Tags text="Funk"/>
                    <Tags text="Funk"/>
                    <p>This is some data that was added in here to test the script
                        This is some data that was added in here to test the script
                        This is some data that was added in here to test the script
                    </p>
                </div>
                <div class="card-buttons">
                    <StandardButton class="ssa" text="Reject"  />
                    <StandardButton text="View"/>
                </div>
            </div>     
        </div>

        <div class="card">
            <div class="col-1">
                <img src="/images/image.jpg" alt="script image" />
            </div>
            <div class="col-2">
    
                <div class="card-body">
                    <h1>The Uncharted sea</h1>
                    <Tags text="Funk"/>
                    <Tags text="Funk"/>
                    <p>This is some data that was added in here to test the script
                        This is some data that was added in here to test the script
                        This is some data that was added in here to test the script
                    </p>
                </div>
                <div class="card-buttons">
                    <StandardButton class="ssa" text="Reject"  />
                    <StandardButton text="View"/>
                </div>
            </div>     
        </div>
    </ScriptwritersAdmin>
</template>

<style scoped>
.ssa {
    background-color: transparent;
    color: black;
    border: 1px solid var(--border-color)
}

.ssa:hover {
    background-color: var(--danger-color);
    color: var(--text-color);
}
.card {
    display: flex;
    height: 150px;
    border: 1px solid var(--border-color);
    overflow: hidden;
    background-color: white;
    border-radius: 5px;
}

.card h1 {
    font-weight: bold;
}

.col-1 {
    min-width: 30%;
    width: 40%;
}

.col-1 img {
    width: 100%;
    background-size: contain;
    height: 100%;
}

.col-2 {
    width: 100%;
    position: relative;
}
.card-body {
    padding: 7px 12px;
}

.card-body p {
    margin-top: 5px;
    font-size: 14px;
    width: 300px;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

.card-buttons {
    width: 100%;
    padding: 9px 12px;
    position: absolute;
    bottom: 0;
    display: flex;
    justify-content: flex-end;
}

.card-buttons .btn {
    font-size: 13px;
    height: 35px;
    margin-right: 10px;
}

.tag-text {
    font-size: 13px;
}

/* overide the default growth size on this screen size */
@media only screen and (min-width: 535px) {
  .tag-text {
      font-size: 13px;
    }
}
</style>
