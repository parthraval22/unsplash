<template>
    <div>
        <NavBar />    
        <div class="main">
            <div class="content-container">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<script>
import NavBar from './components/navbar'
export default {
    components:{NavBar},
}
</script>
