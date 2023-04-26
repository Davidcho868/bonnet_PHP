<?php

class Formulaire
{
    protected ?int $id;
    protected ?string $subject = '';
    protected ?string $email = '';
    protected ?string $content = '';

    protected array $errors = [];




    public function __construct(array $postData) {
        if (isset($postData['subject'])) {
            $this->setSubject(trim($postData['subject']));
        }
        if (isset($postData['email'])) {
            $this->setEmail(trim($postData['email']));
        }
        if (isset($postData['content'])) {
            $this->setContent(trim($postData['content']));
        }
    }

    public function getId(): ?int {
		return $this->id;
	}

	public function setId(?int $id): self {
		$this->id = $id;
		return $this;
	}

    public function getSubject(): ?string {
		return $this->subject;
	}
	
	
	public function setSubject(?string $subject): self {
		$this->subject = $subject;

        if (empty($subject)) {
            $this->errors[] = "Veuillez entrer un sujet";
        } elseif (strlen($subject) <= 10) {
            $this->errors[] = "Veuillez entrer un sujet plus long (10 caractères minimum)";
        }
		return $this;
	}
	
	public function getEmail(): ?string {
		return $this->email;
	}
	
	
	public function setEmail(?string $email): self {
		$this->email = $email;
        if (empty($email)) {
            $this->errors[] = "Veuillez entrer un email";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Veuillez entrer un email valide";
        }
		return $this;
	}


	public function getContent(): ?string {
		return $this->content;
	}
	
	
	public function setContent(?string $content): self {
		$this->content = $content;
        if (empty($content)) {
            $this->errors[] = "Veuillez entrer un message";
        } elseif (strlen($content) <= 50) {
            $this->errors[] = "Veuillez entrer un message plus long (50 caractères minimum)";
        }
		return $this;
	}

    public function isSubmitted(): bool {
        if (
            !empty($this->getSubject())
            || !empty($this->getEmail())
            || !empty($this->getContent())
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function isValid(): bool {
        return empty($this->errors);
    }

    
	public function getErrors(): array {
		return $this->errors;
	}
}

?>