<?php 

  class Book {
    public $id;
    public $title;
    public $author;
    public $description;
    public $year_of_release;
    public $image;
    public $user_id;
    public $note_review;
    public $count_reviews;

    public function query($where, $params){
      $database = new Database(config('database'));

      return $database->query(
        query: "
          select
            l.id,
            l.title,
            l.author,
            l.description,
            l.year_of_release,
            l.image,
            round(sum(a.note) / 5.0) as note_review,
            count(a.id) as count_reviews
          from
            books l
          left join reviews a on a.book_id = l.id
          where $where
          group by
            l.id,
            l.title,
            l.author,
            l.description,
            l.year_of_release,
            l.image;
        ",
        class: self::class,
        params: $params
      ); 
    }

    public static function get($id){
      return (new self)->query('l.id = :id', ['id' => $id])->fetch();
    }

    public static function all($search) {
      return (new self)->query('l.title like :search', ['search' => "%$search%"])->fetchAll();
    }

    public static function my($user_id) {
      return (new self)->query('l.user_id = :user_id', ['user_id' => $user_id])->fetchAll();
    }
  }  