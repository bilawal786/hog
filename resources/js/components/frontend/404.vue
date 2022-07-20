<template>
<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Oops!</h1>
				<h2>404 - The Page can't be found</h2>
			</div>
            <router-link to="/">Go TO Homepage</router-link>
		</div>
	</div>
</template>
<script>
export default {
    mounted () {
        window.scrollTo(0, 0)
    }
};
</script>