# config valid only for Capistrano 3.1
lock '3.2.1'


set :app_path,    "app"
set :stages,        %w(production)
set :default_stage,  "production"


# =============================================================================
# REQUIRED VARIABLES
# =============================================================================
set :application, 'Contagric'
set :domain, "contagric.com"
set :deploy_to,   "/kunden/homepages/22/d527927663/htdocs"

# =============================================================================
# SCM OPTIONS
# =============================================================================
set :repo_url, 'git@github.com:AlexAznar/ContabilidadAgricola.git'
set :scm,         :git
set :branch, 'master'
set :tmp_dir, "/kunden/homepages/22/d527927663/htdocs/tmp"

# =============================================================================
# SSH OPTIONS
# =============================================================================
set :user, "u77251536"
set :use_sudo,      false


# =============================================================================
# CAPISTRANO OPTIONS
# =============================================================================
set :keep_releases, 3
set :deploy_via, :remote_cache


set :model_manager, "doctrine"


set :shared_files,      ["app/config/parameters.yml"]
set :shared_children,      ["web/uploads"]
set :php_bin, "/usr/bin/php5.4"


desc "Enlazando la configuracion"
task :link_config do
  run "cd #{release_path}/app/config && ln -s #{shared_path}/app/config/parameters.yml ."
end

set :copy_vendors, false
set :update_vendors, false

desc "Creates and set dirs permissions"
task :create_dirs do
    run "cd #{release_path} && chmod -R 775 app/cache app/logs"
    run "cd #{release_path} && sudo /bin/chown www-data:www-data -R app/cache app/logs"
end

after :deploy, :create_dirs

namespace :deploy do

  desc 'Restart application'
  task :restart do
    on roles(:app), in: :sequence, wait: 5 do
      # Your restart mechanism here, for example:
      # execute :touch, release_path.join('tmp/restart.txt')
    end
  end

  after :publishing, :restart


  after :restart, :clear_cache do
    on roles(:web), in: :groups, limit: 3, wait: 10 do
      # Here we can do anything such as:
      # within release_path do
      #   execute :rake, 'cache:clear'
      # end
    end
  end

end
