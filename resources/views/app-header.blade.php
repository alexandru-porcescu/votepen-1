<header class="header-votepen user-select">
	<div class="left-header">
		<vui-menu-button :checked="sidebar"></vui-menu-button>
	</div>

    <router-link :to="{ path: '/' }" class="desktop-only">
        <img src="https://cdn.jsdelivr.net/npm/votepen@18.0.0/imgs/logo-small.png" alt="VotePen" @click="homeRoute"
        	class="logo-votepen" data-toggle="tooltip" data-placement="bottom" title="Home">
    </router-link>

    <div class="flex-display">
        <div class="dropdown head-notification-icons">
        	@if(Auth::check())
				<button type="button" class="btn-nth relative" id="messages-btn" @click="changeRoute('messages')"
	            data-toggle="tooltip" data-placement="bottom" title="Messages">
	                <i class="v-icon v-inbox" aria-hidden="true"></i>
	                <span class="queue-number" v-show="unreadMessages" v-text="unreadMessages"></span>
	            </button>

	            <button type="button" class="btn-nth relative" aria-haspopup="true"
				data-toggle="tooltip" data-placement="bottom" title="Notifications" aria-expanded="false" @click="changeRoute('notifications')">
	           		<i class="v-icon v-bell-2" aria-hidden="true"></i>
	               	<span class="queue-number" v-show="unreadNotifications" v-text="unreadNotifications"></span>
	            </button>
        	@endif

        	@if (!Auth::check())
        		<button class="v-button v-button--green v-button--green-navbar relative" @click="mustBeLogin">
	        		Sign up/Log in
	        	</button>
        	@endif

            <button type="button" class="btn-nth relative" aria-haspopup="true"
			data-toggle="tooltip" data-placement="bottom" title="Search" aria-expanded="false" @click="changeRoute('search')">
           		<i class="v-icon v-search-3" aria-hidden="true"></i>
            </button>

			<router-link :to="'/'" class="btn-nth relative" aria-haspopup="true"
			data-toggle="tooltip" data-placement="bottom" title="Home" aria-expanded="false">
           		<i class="v-icon v-home" aria-hidden="true" @click="homeRoute"></i>
            </router-link>

			@if(optional(Auth::user())->isVotePenAdministrator())
				<a href="/backend" class="btn-nth relative margin-right-half">
					<i class="v-icon v-dashboard" aria-hidden="true"></i>
				</a>
			@endif
        </div>

		@if(Auth::check())
	        <div class="ui icon top right green pointing dropdown pull-right" id="more-button">
				<img src="{{ Auth::user()->avatar }}?w=100" alt="My VotePen" class="navbar-avatar">
	            <div class="menu">
	                <div class="header">My VotePen</div>

					<router-link :to="'/' + '@' + auth.username" class="item">
	                    Profile
	                </router-link>

					<router-link :to="'/submit'" class="item">
	                    Submit
	                </router-link>

	                <router-link :to="{ path: '/bookmarks' }" class="item">
	                    Bookmarks
	                </router-link>

					<router-link :to="{ path: '/subscribed-channels' }" class="item">
	                    Subscribed Channels
	                </router-link>

					<router-link :to="'/find-channels'" class="item">
						Find Channels
					</router-link>

	    			<router-link :to="'{{ '/@' . Auth::user()->username }}/settings'" class="item">
	                    Settings
	                </router-link>

					<router-link :to="'/channel'" class="item">
	                    Create a new Channel
	                </router-link>

	                <div class="ui divider"></div>

					@if(!isMobileDevice())
						<div class="header" v-if="Store.moderatingCategories.length">Moderating Channels</div>
						<router-link :to="'/c/' + item.name" class="item" v-for="(item, index) in Store.moderatingCategories"
									 :key="item.id" v-if="Store.moderatingCategories.length && index < 6">
							<img class="square" :src="item.avatar" :alt="item.name">
							@{{ item.name }}
						</router-link>
						<div class="ui divider" v-if="Store.moderatingCategories.length && Store.moderatingCategories.length < 6"></div>

						<div class="item" v-if="Store.moderatingCategories.length && Store.moderatingCategories.length > 6">
							<i class="v-icon v-more"></i>

							<div class="left menu">
								<router-link :to="'/c/' + item.name" class="item" v-for="(item, index) in Store.moderatingCategories"
											 :key="item.id" v-if="index > 6">
									<img class="square" :src="item.avatar" :alt="item.name">
									@{{ item.name }}
								</router-link>
							</div>
						</div>
						<div class="ui divider" v-if="Store.moderatingCategories.length && Store.moderatingCategories.length > 6"></div>
					@endif
				 	@if(optional(Auth::user())->isVotePenAdministrator())
						<div class="header">Admin</div>
						<a href="/backend" class="item">
							Backend
						</a>
						<router-link :to="'/big-daddy/suggested-categories'" class="item">
							Big Daddy
						</router-link>
						<div class="ui divider"></div>
					@endif
	                <a class="item desktop-only" @click="changeModalRoute('keyboard-shortcuts-guide')">
	                    Keyboard Shortcuts
	                </a>

	                <router-link :to="'/help'" class="item">
	                    Help
	                </router-link>

					<div class="item">
						<span>&#8592; VotePen</span>

						<div class="left menu green">
							<a href="/about" class="item">
			                    About
			                </a>

			                <a href="mailto:info@votepen.com" class="item">
			                    Contact Us
			                </a>

			                <router-link class="item" to="/feedback">
			                    Feedback
			                </router-link>

			                <a class="item" href="https://votepen.com/tos">
			                    Site Rules
			                </a>

			                <a class="item" href="https://votepen.com/privacy-policy">
			                    Privacy Policy
			                </a>

							<a href="https://medium.com/votepen" class="item">
			                    Blog
			                </a>

							<a href="/credits" class="item">
			                    Credits
			                </a>

							<a href="https://t.me/VotePen" class="item" target="_blank">
			                    Announcements
			                </a>
						</div>
					</div>
	                <a href="/logout" class="item">
	                    Logout
	                </a>
	                <div onclick="location.href='https://madewithlove.org.in/'" class="madewithlove">Made with <img style="width:9px;margin-bottom:2px;margin-right:2px;margin-left:2px" src="https://cdn.jsdelivr.net/npm/twemoji@2.5.0/2/svg/2764.svg"> in India</div>
	            </div>
	        </div>
		@endif
    </div>
</header>