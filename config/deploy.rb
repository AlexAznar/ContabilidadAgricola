# config valid only for Capistrano 3.1
lock '3.2.1'

set :deploy_to,   "./"
set :app_path,    "app"
set :stages,        %w(production)
set :default_stage,  "production"


set :application, 'Contagric'
set :repository, 'https://AlexAznar@github.com/AlexAznar/ContabilidadAgricola.git'
set :scm,         :git
set :branch, $1 if `git branch` =~ /\* (\S+)\s/m

set :use_sudo,      false
set :model_manager, "doctrine"

set :user, "u77251536"
set :webserver_user, 'ftpusers'
set :keep_releases,  3

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





# Default branch is :master
# ask :branch, proc { `git rev-parse --abbrev-ref HEAD`.chomp }.call

# Default deploy_to directory is /var/www/my_app
# set :deploy_to, '/var/www/my_app'

# Default value for :scm is :git
# set :scm, :git

# Default value for :format is :pretty
# set :format, :pretty

# Default value for :log_level is :debug
# set :log_level, :debug

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
# set :linked_files, %w{config/database.yml}

# Default value for linked_dirs is []
# set :linked_dirs, %w{bin log tmp/pids tmp/cache tmp/sockets vendor/bundle public/system}

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for keep_releases is 5
# set :keep_releases, 5

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
