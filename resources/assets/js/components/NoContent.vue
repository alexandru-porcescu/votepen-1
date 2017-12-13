<template>
	<transition name="fade">
		<div class="no-content-wrapper user-select" v-show="visible">
	    	<img src="https://cdn.jsdelivr.net/npm/twemoji@2.5.0/2/svg/1f937.svg" style="width:102px">
	        <h1>{{ text }}</h1>
		</div>
	</transition>
</template>

<script>
    export default {
		props: ['text'],

		data () {
			return {
				visible: true
			}
		}
    }
</script>
