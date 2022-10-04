while [ -n "$1" ]
    do
        case "$1" in
        -s) php artisan migrate:fresh
            php artisan db:seed ;;
        esac

        php artisan test $@
        shift
    done

