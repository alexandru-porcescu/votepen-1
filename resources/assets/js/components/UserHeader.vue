<template>
	<div>
		<div v-bind:style="{ background: coverBackground }" class="profile-cover">
		    <div class="container padding-top-3 user-select full-width">
		        <div class="cols-flex">
		            <div class="category-header-left">
		               	<!-- avatar -->
		               		<div class="profile-avatar avatar-preview" v-if="$route.name == 'user-settings-profile'">
			                    <button type="button">
						            <img v-bind:alt="userStore.username" v-bind:src="userStore.avatar" class="circle" />

						            <div class="update circle">
						                <i class="v-icon v-photo" aria-hidden="true"></i>
						                Upload photo
						            </div>
						        </button>

				                <input type="file" id="fileUploadFile" @change="passToCropModal">
		                    </div>

		                    <div class="profile-avatar" v-else>
	    						<router-link :to="'/@' + userStore.username">
		                        	<img v-bind:src="userStore.avatar" v-bind:alt="userStore.name" class="circle" />
		                        </router-link>
		                    </div>
		                <!-- end avatar -->
		            </div>

		            <div class="category-header-middle">
						<h1>
						    {{ userStore.name }} <img v-if="userStore.stats.submission_karma >= 1000" src="https://cdn.jsdelivr.net/npm/votepen@24.0.0/imgs/verified.svg" style="width:21px">
						</h1>

	    				<router-link :to="'/@' + userStore.username">
		                    <h2>
		                        <i class="v-icon v-atsign" aria-hidden="true"></i>{{ userStore.username }}
		                    </h2>
		                </router-link>

		                <p v-text="userStore.bio"></p>

						<span class="inline-block">
	                        <i class="v-icon v-submissions" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Submissions"></i>{{ userStore.stats.submissionsCount }}
		                </span>

						<span class="inline-block">
	                        <i class="v-icon v-chat" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Comments"></i>{{ userStore.stats.commentsCount }}
		                </span>

						<span class="inline-block">
	                        <i class="v-icon v-calendar" aria-hidden="true"></i>Joined: {{ date }}
		                </span>

		                <a v-bind:href="userStore.info.website" rel="nofollow" target="_blank" v-if="userStore.info.website" class="inline-block">
		                	<i class="v-icon v-link" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Website"></i>{{ userStore.info.website }}
		                </a>

		                <span v-if="userStore.location" class="inline-block">
	                        <i class="v-icon v-location" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Location"></i>{{ userStore.location }}
		                </span>

						<span v-if="userStore.info.twitter " class="inline-block">
							<a v-bind:href="'https://twitter.com/' + userStore.info.twitter" rel="nofollow" target="_blank">
	                        	<i class="v-icon v-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Twitter"></i>{{ userStore.info.twitter }}
							</a>
		                </span>
		            </div>

					<div class="category-header-right">
						<div class="karma">
							<div class="karma-number">
								{{ userStore.stats.submission_karma }}
							</div>

							<div class="karma-text">
								Post Karma
							</div>
						</div>

						<div class="karma">
							<div class="karma-number">
								{{ userStore.stats.comment_karma }}
							</div>

							<div class="karma-text">
								Comment Karma
							</div>
						</div>
					</div>
		        </div>
		    </div>
		</div>

		<nav class="nav has-shadow user-select">
		    <div class="container">
		        <div class="nav-left">
					<router-link :to="'/@' + $route.params.username" class="nav-item is-tab" active-class="is-active" exact>
						Submissions
					</router-link>

					<router-link :to="'/@' + $route.params.username + '/comments'" class="nav-item is-tab" active-class="is-active" exact>
						Comments
					</router-link>

					<router-link :to="'/@' + $route.params.username + '/settings'" class="nav-item is-tab" active-class="is-active" v-if="isAuth">
						Settings
					</router-link>

					<router-link :to="'/@' + $route.params.username + '/upvoted-submissions'" class="nav-item is-tab" active-class="is-active" v-if="isAuth">
						Upvoted
					</router-link>

					<router-link :to="'/@' + $route.params.username + '/downvoted-submissions'" class="nav-item is-tab" active-class="is-active" v-if="isAuth">
						Downvoted
					</router-link>
		        </div>

		        <div class="channel-admin-btn">
		        	<i class="v-icon h-yellow pointer" :class="bookmarked ? 'go-yellow v-unbookmark' : 'v-bookmark go-gray'"
		        	@click="bookmark" v-if="$route.params.username != auth.username"
	        		data-toggle="tooltip" data-placement="bottom" title="Bookmark"></i>

		            <message-button :id="userStore.id" v-if="$route.params.username != auth.username && !isGuest"></message-button>

					<router-link class="v-button" :to="{ name: 'user-settings-profile' }" v-show="$route.params.username == auth.username">
						Edit Profile
					</router-link>
		        </div>
		    </div>
		</nav>
	</div>
</template>

<script>
import MessageButton from '../components/MessageButton.vue';
import Helpers from '../mixins/Helpers';

export default {
	mixins: [Helpers],

    components: {
    	MessageButton
    },

    data: function () {
        return {
            Store,
            auth,
        	bookmarked: false,
        	fileUploadFormData: new FormData(),
        }
    },

    created () {
    	this.setBookmarked()
    },

    watch: {
        '$route' () {
            this.setBookmarked();
        },

        'Store.userBookmarks' () {
            this.setBookmarked();
        },
    },

	mounted () {
		this.$nextTick(function () {
        	this.$root.loadSemanticTooltip()
		})
	},

	methods: {
		/**
		 * Passes the photo to the cropModal to take care of the rest
		 *
		 * @return void
		 */
		passToCropModal (e) {
            this.fileUploadFormData.append('photo', e.target.files[0]);

    		axios.post('/upload-temp-avatar', this.fileUploadFormData)
				.then((response) => {
					this.$eventHub.$emit('crop-photo-uploaded', response.data)
	            });

    		this.$eventHub.$emit('crop-user-photo')
		},

    	/**
         * Whether or not user has bookmarked the submission
         *
         * @return void
         */
        setBookmarked () {
        	if (Store.userBookmarks.indexOf(Store.user.id) != -1) {
	        	this.bookmarked = true;
	        } else {
                this.bookmarked = false;
			}
	    },

        /**
         * Toggles the category into bookmarks
		 *
		 * @return void
         */
    	bookmark (user)
    	{
    		if (this.isGuest) {
        		this.mustBeLogin();
        		return;
        	}

    		this.bookmarked = !this.bookmarked

			axios.post('/bookmark-user', {
				id: Store.user.id
			}).then((response) => {
				if (Store.userBookmarks.indexOf(Store.user.id) != -1){
                	var index = Store.userBookmarks.indexOf(Store.user.id)
                	Store.userBookmarks.splice(index, 1)

                	return
                }
				Store.userBookmarks.push(Store.user.id)
			})
    	},
    },

    computed: {
    	isAuth ()
    	{
    		return auth.username == this.$route.params.username
			},

    	userStore ()
    	{
    		if ( auth.username == this.$route.params.username ) {
    			return auth
    		}

    		return Store.user
    	},

    	date ()
			{
				return moment(this.userStore.created_at).utc(moment().format("MMM Do")).format("MMM Do")
    	},

      coverBackground ()
      {
      	if (this.userStore.color == 'Red') {
      		return '#9a4e4e'
      	} else if (this.userStore.color == 'Blue') {
      		return '#5487d4'
      	} else if (this.userStore.color == 'Dark Blue') {
      		return '#2f3b49'
      	} else if (this.userStore.color == 'Dark Green') {
      		return '#507e75'
      	} else if (this.userStore.color == 'Bright Green') {
      		return 'rgb(117, 148, 127)'
      	} else if (this.userStore.color == 'Purple') {
      		return '#4d4261'
      	} else if (this.userStore.color == 'Orange') {
      		return '#ffaf40'
      	} else if (this.userStore.color == 'Pink') {
      		return '#ec7daa'
      	} else { // userStore.color == 'Black'
      		return '#333'
      	}
      }
    }
}
</script>
