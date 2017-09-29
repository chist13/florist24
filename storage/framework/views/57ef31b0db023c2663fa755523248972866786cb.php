<nav class="navbar-default navbar-static-side">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">

			<li class="nav-header">
				<div class="dropdown profile-element">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<span class="clear">
							<span class="block m-t-xs">
								<strong class="font-bold">Example user</strong>
							</span> <span class="text-muted text-xs block">Example menu <b class="caret"></b></span>
						</span>
					</a>
					<ul class="dropdown-menu animated fadeInRight m-t-xs">
						<li><a href="#">Logout</a></li>
					</ul>
				</div>
				<div class="logo-element">
					IN+
				</div>
			</li>

            <template v-for="(item, i) in navigation">
                <div :key="i" v-if="item.pathName == null && item.children && item.children.length > 0">
                    <template v-for="(subItem, j) in item">

                        <router-link
                                :key="j"
                                exact
                                tag="li"
                                :to="{name: subItem.pathName}"
                        >
                            <a href="#" @click.prevent="">
                                <i class="fa fa-th-large" :class="[subItem.icon ? 'fa-' + subItem.icon : 'fa-home']"></i>
                                <span class="nav-label" v-text="subItem.label"></span>
                            </a>
                        </router-link>

                    </template>
                </div>

                <router-link
                    v-else
                    :key="i"
                    exact
                    tag="li"
                    :to="{name: item.pathName}"
                >
                    <a href="#" @click.prevent="">
                        <i class="fa fa-th-large" :class="[item.icon ? 'fa-' + item.icon : 'fa-home']"></i>
                        <span class="nav-label" v-text="item.label"></span>
                    </a>
                </router-link>

            </template>


		</ul>
	</div>
</nav>