<div class="welcome-getting-started">
    <div class="welcome-demo-import">
        <h3><?php echo esc_html__('Manual Setup', 'hello-fse-blog'); ?></h3>

        <p><?php echo esc_html__('If you want to change default homage page with your own created page, Go to settings > reading and set your page.', 'hello-fse-blog'); ?></p>
        
        <p><strong><?php echo esc_html__('FROM ELEMENTOR', 'hello-fse-blog'); ?></strong></p>
        <ol>
            <li><?php echo esc_html__('Firstly install and activate "Elementor Website Builder" plugin from', 'hello-fse-blog'); ?> <a href="<?php echo esc_url(admin_url('post-new.php?page=hello-fse-blog-welcome&section=recommended_plugins')); ?>" target="_blank"><?php echo esc_html__('Recommended Plugin page.', 'hello-fse-blog'); ?></a></li>
            <li><?php echo esc_html__('Create a new page and edit with Elementor. Drag and drop the elements in the Elementor to create your own design.', 'hello-fse-blog'); ?></li>
            <li><?php echo esc_html__('Now go to Appearance &gt; Customize &gt; Homepage Settings and choose "A static page" for "Your latest posts" and select the created page for "Home Page" option.', 'hello-fse-blog'); ?></li>
        </ol>
        
    </div>

    <div class="welcome-demo-import">
        <h3><?php echo esc_html__('Demo Importer', 'hello-fse-blog'); ?></h3>
        <div class="welcome-theme-thumb">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="<?php printf(esc_attr__('%s Demo', 'hello-fse-blog'), $this->theme_name); ?>">
        </div>

        <div class="welcome-demo-import-text">
            <p><?php esc_html_e('Or you can get started by importing the demo with just one click.', 'hello-fse-blog'); ?></p>
            <p><?php echo sprintf(esc_html__('Click on the button below to install and activate the One Click Demo Importer Plugin. For more detailed documentation on how the demo importer works, click %s.', 'hello-fse-blog'), '<a href="'.esc_url('https://docs.sparklewpthemes.com/hello-fse-blog/').'" target="_blank">' . esc_html__('here', 'hello-fse-blog') . '</a>'); ?></p>
            <?php echo $this->generate_demo_installer_button(); ?>
        </div>
    </div>
</div>